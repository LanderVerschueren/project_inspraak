using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using System.Collections.Generic;
using System;
using LitJson;

public class AddReaction : MonoBehaviour {

  public InputField addReactionField;
  public GameObject content;
  public Button addReactionBtn;
  public GameObject originalPanel;
  public GameObject reactionParent;
  public GameObject reactionUser;

  public RectTransform oldReactionRect;
  private RectTransform newReactionRect;
  string reaction;
  public static int nrOfReactions;
  public List<List<Reaction>> reactionList;
  private JsonData commentData;
  private int reactionDifference;

  public GameObject originalProject;

  private int currentProject;



	// Use this for initialization
	void Start () {
   // reactionList = new List<Reaction>();
	}
	
	// Update is called once per frame
	void Update () {
	
	}

  /*public void CreateReaction()
  {
    CreateReaction(null);
  }*/
  public IEnumerator LoadComments(int projectnr)
  {
    string url = "http://bananas.multimediatechnology.be/api/comments/" + projectnr.ToString();
    WWW www = new WWW(url);
    yield return www;
    Debug.Log(url);
    if (www.error == null)
    {
      commentData = JsonMapper.ToObject(www.text);
    }
    else
    {
      Debug.Log("ERROR: " + www.error);
    }
    //Debug.Log("aantal reacties = " + commentData[0].Count);
    int reactionsToPrint = commentData[0].Count;
    for (int i = 0; i < commentData[0].Count; i++)
    {
      int id = int.Parse(commentData[0][i]["id"].ToString());
      string text = commentData[0][i]["comment"].ToString();
      string userName = commentData[0][i]["comment"].ToString();
      int nrOfReactions = commentData[0].Count;

      try
      {
        userName = commentData[0][i]["user"]["name"].ToString();
      }
      catch (Exception exception)
      {
        userName = "Anoniem";
        Debug.Log(exception);
      }
      Debug.Log("proberen eh " + userName);

      CreateReaction(text, id, userName, reactionsToPrint, nrOfReactions);
      reactionsToPrint--;
    }
  }
  
  IEnumerator PostReaction()
  {
    if (addReactionField.text != "")
    {
      currentProject = int.Parse(originalProject.name.Replace("Project", "")); //haal projectnr uit naam
      //Debug.Log(currentProject);

      string reactionUrl = "http://bananas.multimediatechnology.be/api/comments/place/" + (currentProject+1) + "?text=" + addReactionField.text + "?user_id=3";
      //Debug.Log(reactionUrl);
      WWWForm reactionForm = new WWWForm();
      reactionForm.AddField("text", addReactionField.text);
      //reactionForm.AddField("user_id", 0);
      reactionForm.AddField("fk_user", 3);
      WWW reactionwww = new WWW(reactionUrl, reactionForm);

      yield return reactionwww;

      addReactionField.text = "";

      if (reactionwww.error == null)
      {
        Debug.Log("REACTION OK!: " + reactionwww.text);
        StartCoroutine(LoadComments(currentProject+1));
      }
      else
      {
        Debug.Log("REACTION ERROR: " + reactionwww.error);
      }
    }
  }

  public void CreateReaction(string text, int reactionNr, string userName, int reactionsToPrint, int nrOfReactions)
  {
    //CreateLists(text, reactionNr, userName, currentproject);
    //List<string> textList = new List<string>();
    Debug.Log("reactionsToPrint = " + reactionsToPrint);
    GameObject newReaction = GameObject.Instantiate(originalPanel) as GameObject;
    newReaction.name = "Reaction"+ nrOfReactions;

    reactionDifference = nrOfReactions - reactionsToPrint;

    //afmetingen instellen + onder elkaar schikken
    newReaction.GetComponent<RectTransform>().SetParent(reactionParent.transform);
    newReaction.GetComponent<RectTransform>().localScale = new Vector3(1f, 1f, 1f);
    newReaction.GetComponent<RectTransform>().sizeDelta = new Vector2(oldReactionRect.rect.width, oldReactionRect.rect.height);
    newReaction.GetComponent<RectTransform>().localPosition = new Vector2(0, -300 * (reactionDifference));
    //newReaction.GetComponentInChildren<Text>().text = addReactionField.text;
    //textList.Add(newReaction.GetComponentInChildren<Text>().text);
    //Debug.Log("TextLIST " + textList[0]);
    //newReaction.GetComponentInChildren<Text>().GetComponentInChildren<Text>().text = userName;
    newReaction.GetComponentInChildren<Text>().text = text;
    reactionUser.GetComponentInChildren<Text>().text = userName;
    //reactionList.Add(newReaction);

    //printReactions();

    newReaction.SetActive(true);

    Debug.Log(reactionList);

    updateContent();
  }

  public void updateContent()
  {
    if (reactionDifference > 1)
    {
    content.GetComponent<RectTransform>().offsetMax = new Vector2(content.GetComponent<RectTransform>().offsetMax.x, (content.GetComponent<RectTransform>().offsetMax.y + 270));
    }
  }

  /*public void printReactions()
  {
    foreach (Reaction reaction in reactionList)
    {
      print(reaction.username + " " + reaction.text);
    }
  }*/
  public void SubmitClick()
  {
    StartCoroutine(PostReaction());
  }
}


public class Reaction
{
  public int id { get; set; }
  public string username { get; set; }
  public string text { get; set; }
}
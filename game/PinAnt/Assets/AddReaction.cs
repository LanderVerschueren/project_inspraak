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

  public RectTransform oldReactionRect;
  private RectTransform newReactionRect;
  string reaction;
  public static int nrOfReactions;
  public List<List<Reaction>> reactionList;
  private JsonData commentData;
  private int reactionDifference;

  public GameObject reactionUser;

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

  public void CreateReaction(string text, int reactionNr, string userName, int reactionsToPrint, int nrOfReactions)
  {
    //CreateLists(text, reactionNr, userName, currentproject);
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
    newReaction.GetComponentInChildren<Text>().text = text;

    reactionUser.GetComponentInChildren<Text>().text = userName;

    addReactionField.text = "";

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
    content.GetComponent<RectTransform>().offsetMax = new Vector2(content.GetComponent<RectTransform>().offsetMax.x, (content.GetComponent<RectTransform>().offsetMax.y + 370));
    }
  }

  /*public void printReactions()
  {
    foreach (Reaction reaction in reactionList)
    {
      print(reaction.username + " " + reaction.text);
    }
  }*/
}

public class Reaction
{
  public int id { get; set; }
  public string username { get; set; }
  public string text { get; set; }
}
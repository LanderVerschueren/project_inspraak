using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using LitJson;
using System;
using System.Collections.Generic;

public class LoadProjectTitle : MonoBehaviour {
  public GameObject completeProjectPanel;

  public static int currentProject;

  public GameObject titlePanel;
  public GameObject likePanel;
  public GameObject dislikePanel;
  public GameObject questionPanel;
  public GameObject extraInfoPanel;

  public AddReaction addReaction;

  private JsonData commentData;

	// Use this for initialization
	void Start () 
  {
    currentProject = int.Parse(completeProjectPanel.name.Replace("Project", "")); //haal projectnr uit naam
    Debug.Log(currentProject);

    titlePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].title;
    likePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].likes;
    dislikePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].dislikes;
    questionPanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].question;
    extraInfoPanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].info;

    StartCoroutine(LoadComments(currentProject + 1));
  }
	
	// Update is called once per frame
	void Update () {
	
	}

  IEnumerator LoadComments(int projectnr)
  {
    string url = "http://bananas.multimediatechnology.be/api/comments/"+projectnr.ToString();
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
      catch(Exception exception)
      {
        userName = "Anoniem";
        Debug.Log(exception);
      }
      Debug.Log("proberen eh " + userName);

      addReaction.CreateReaction(text, id, userName, reactionsToPrint, nrOfReactions);
      reactionsToPrint--;
    }
    
    //string text = commentData[0][0]["comment"].ToString();
    //Debug.Log("nr = " + projectnr + text);

    
  }
}

using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using LitJson;
using System;
using System.Collections.Generic;

public class LoadProjectTitle : MonoBehaviour
{
  public GameObject completeProjectPanel;

  public static int currentProject;

  public GameObject titlePanel;
  public GameObject likePanel;
  public GameObject dislikePanel;
  public GameObject questionPanel;
  public GameObject extraInfoPanel;
  public GameObject extraInfoTitle;

  public AddReaction addReaction;

  private JsonData commentData;

  // Use this for initialization
  void Start()
  {
    currentProject = int.Parse(completeProjectPanel.name.Replace("Project", "")); //haal projectnr uit naam
    Debug.Log(currentProject);

    titlePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].title;
    likePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].likes;
    dislikePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].dislikes;
    questionPanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].question;
    extraInfoPanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].info;
    extraInfoTitle.GetComponent<Text>().text = "Extra Info " + LoadProjectSettings.projectList[currentProject].title;

    StartCoroutine(addReaction.LoadComments(currentProject + 1));
  }

  // Update is called once per frame
  void Update()
  {

  }

  //string text = commentData[0][0]["comment"].ToString();
  //Debug.Log("nr = " + projectnr + text);
}

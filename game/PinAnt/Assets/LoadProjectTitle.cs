using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class LoadProjectTitle : MonoBehaviour {
  public GameObject completeProjectPanel;

  private int currentProject;

  public GameObject titlePanel;
  public GameObject likePanel;
  public GameObject dislikePanel;
  public GameObject questionPanel;
  public GameObject extraInfoPanel;

	// Use this for initialization
	void Start () {

    currentProject = int.Parse(completeProjectPanel.name.Replace("Project", "")); //haal projectnr uit naam
    Debug.Log(currentProject);

    titlePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].title;
    likePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].likes;
    dislikePanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].dislikes;
    questionPanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].question;
    extraInfoPanel.GetComponentInChildren<Text>().text = LoadProjectSettings.projectList[currentProject].info;

	}
	
	// Update is called once per frame
	void Update () {
	
	}
}

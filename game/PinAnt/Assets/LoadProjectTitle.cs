using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using LitJson;

public class LoadProjectTitle : MonoBehaviour {
  public GameObject completeProjectPanel;

  public static int currentProject;

  public GameObject titlePanel;
  public GameObject likePanel;
  public GameObject dislikePanel;
  public GameObject questionPanel;
  public GameObject extraInfoPanel;

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

    LoadComments();
  }
	
	// Update is called once per frame
	void Update () {
	
	}

  IEnumerator LoadComments()
  {
    string url = "http://bananas.multimediatechnology.be/api/comments";

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

  }
}

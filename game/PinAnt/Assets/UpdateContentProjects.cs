using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class UpdateContentProjects : MonoBehaviour {
  public GameObject content;
  private int project;

	// Use this for initialization
	void Start () {
    project = LoadProjectSettings.totalProjects;
    Debug.Log(project);
    UpdateContent();
	}
	
	// Update is called once per frame
	void Update () {
	
	}
  public void UpdateContent()
  {
    /*foreach (Project project in projectList)
    {*/
    for (int i = 0; i < project; i++)
    {
      Debug.Log("loop");
      content.GetComponent<RectTransform>().offsetMax = new Vector2(content.GetComponent<RectTransform>().offsetMax.x + 533.325f, (content.GetComponent<RectTransform>().offsetMax.y));
    }
    //}
  }
}

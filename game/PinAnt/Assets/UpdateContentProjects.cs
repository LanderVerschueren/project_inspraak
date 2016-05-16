using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class UpdateContentProjects : MonoBehaviour {
  public GameObject content;
  public GameObject project;

	// Use this for initialization
	void Start () {
    UpdateContent();
    Debug.Log(ProjectSettings.totalProjects);
	}
	
	// Update is called once per frame
	void Update () {
	
	}
  public void UpdateContent()
  {
    /*foreach (Project project in projectList)
    {*/
    for (int i = 0; i < ProjectSettings.totalProjects; i++)
    {
      Debug.Log("loop");
      content.GetComponent<RectTransform>().offsetMax = new Vector2(content.GetComponent<RectTransform>().offsetMax.x + 533.325f, (content.GetComponent<RectTransform>().offsetMax.y));
    }
    //}
  }
}

using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class UpdateContactProjects : MonoBehaviour {
  public GameObject content;
  public GameObject project;

  public List<GameObject> projectList;
  

	// Use this for initialization
	void Start () {
    projectList = new List<GameObject>();
    projectList.Add(project);
    projectList.Add(project);

    UpdateContent();

	}
	
	// Update is called once per frame
	void Update () {
	
	}
  public void UpdateContent()
  {
    foreach (GameObject project in projectList)
    {
    content.GetComponent<RectTransform>().offsetMax = new Vector2(content.GetComponent<RectTransform>().offsetMax.x +800, (content.GetComponent<RectTransform>().offsetMax.y));
    }
  }
}

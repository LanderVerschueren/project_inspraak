using UnityEngine;
using System.Collections;

public class MakeTestProjects : MonoBehaviour {
  public static int projects;
	// Use this for initialization
	void Start () {
    projects = GetCanvasSize.nrOfProjects;
    Debug.Log("nrprojects = " + projects);
	}
	
	// Update is called once per frame
	void Update () {
	
	}

  public void newProject()
  {
    projects++;
    Debug.Log("nrprojects = " + projects);
  }
}

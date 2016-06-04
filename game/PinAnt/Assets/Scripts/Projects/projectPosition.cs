using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class projectPosition : MonoBehaviour {
  private static int projects;
	// Use this for initialization
	void Start () {
    projects = GetCanvasSize.nrOfProjects;
    Debug.Log("nrprojects = " + projects);

    MakePanel();
	}

  public void MakePanel()
  {

  }

	// Update is called once per frame
	void Update () {
	
	}
}

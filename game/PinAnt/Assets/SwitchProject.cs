using UnityEngine;
using System.Collections;

public class SwitchProject : MonoBehaviour {

  public GameObject content;
  public GameObject nextButton;
  public GameObject previousButton;

  private Vector3 startPosition;
  private Vector3 nextProjectPosition;
  private Vector3 previousProjectPosition;

	// Use this for initialization
	void Start () {
    nextProjectPosition = new Vector3(-400F, 0);
    previousProjectPosition = new Vector3(400F, 0);
	}
	
	// Update is called once per frame
	void Update () {
	
	}

  public void nextProject()
  {
    //Debug.Log("next");
    content.GetComponent<RectTransform>().position += nextProjectPosition;
    //if content.GetComponent
  }
  public void previousProject()
  {
    //Debug.Log("previous");
    content.GetComponent<RectTransform>().position += previousProjectPosition;
  }
}

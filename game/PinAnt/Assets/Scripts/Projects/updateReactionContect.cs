using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class updateReactionContect : MonoBehaviour {

  public GameObject content;

	// Use this for initialization
	void Start () {
	
	}
	
	// Update is called once per frame
	void Update () {
    update_Content();
	}

  public void update_Content()
  {
    content.GetComponent<RectTransform>().localPosition = new Vector3(0, 0, 0);
  }
}

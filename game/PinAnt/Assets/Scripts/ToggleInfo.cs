using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class ToggleInfo : MonoBehaviour {

  public GameObject infoMenu;
  public bool isInfoActive;

	// Use this for initialization
	void Start () 
  {
    isInfoActive = false;
	}

  public void Toggle_Info()
  {
    isInfoActive = !isInfoActive;
    Debug.Log("Fotoklik");
    infoMenu.SetActive(isInfoActive);
  }

	// Update is called once per frame
	void Update () {
	
	}
}

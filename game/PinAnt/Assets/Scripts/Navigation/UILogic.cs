using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class UILogic : MonoBehaviour {

    public GameObject PlayerLogic;
    public Transform startMarker;
    public Transform endMarker;
    public Color activeColor;
    public Color passiveColor;

	// Use this for initialization
	void Start () {
                PlayerLogic = GameObject.Find("Player");
	}
	
	// Update is called once per frame
	void Update () {
	
	}

    public void OpenTab(GameObject tab_to_open)
    {
        tab_to_open.SetActive(true);
    }

    public void CloseTab(GameObject tab_to_close)
    {
        tab_to_close.SetActive(false);
    }

    public void OpenWebsite(string url)
    {
        Application.OpenURL(url);
        Debug.Log("go to website");
    }

    public void SetActiveButtonColor(Button activeBtn)
    {
        activeBtn.image.color = activeColor;
    }
    public void setPassiveButtonColor(Button passiveBtn)
    {
        passiveBtn.image.color = passiveColor;
    }

    public void OpenHamburgerMenu(GameObject menu)
    {
      OpenTab(menu);
      float speed = 1.0F;
      float startTime = Time.time;
      float journeyLength;
      journeyLength = Vector3.Distance(startMarker.position, endMarker.position);
    }

    public void LerpProbeersel()
    {
    }

}

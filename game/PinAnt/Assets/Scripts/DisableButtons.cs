using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class DisableButtons : MonoBehaviour 
{
  public Button likeButton;
  public Button dislikeButton;
  public Button commentButton;
    public GameObject projectImage;
	// Use this for initialization
	void Start () {
    likeButton.enabled = false;
    dislikeButton.enabled = false;
    commentButton.enabled = false;
	}

  public void Disable_Buttons()
  {
    likeButton.enabled = false;
    dislikeButton.enabled = false;
    commentButton.enabled = false;
  }

	// Update is called once per frame
	void Update () {
	
	}
}

using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class ToggleButtons : MonoBehaviour 
{
  public Button likeButton;
  public Button dislikeButton;
  public Button commentButton;
  public bool isEnabled;

    private int likes = 0;
    private int dislikes = 0;






	// Use this for initialization
	void Start () 
  {
    
	}



    public void Toggle_Buttons()
    {
        isEnabled = !isEnabled;
        likeButton.enabled = isEnabled;
        dislikeButton.enabled = isEnabled;
        commentButton.enabled = isEnabled;
    }

    // Update is called once per frame
    void Update () {
	
	}
}

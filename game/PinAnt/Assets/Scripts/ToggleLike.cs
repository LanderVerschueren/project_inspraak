using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class ToggleLike : MonoBehaviour 
{
  
  public Button likeButton;
  public Button dislikeButton;

   public Text likeButtonText;
   public Text dislikeButtonText;
  //public Text likeDisplay;
  //public Text dislikeDisplay;
  public bool isLiked;
  public bool isDisliked;

	// Use this for initialization
	void Start () 
  {

   
        //isLiked = false;
        //isDisliked = false;
        //likeButton = likeButton.GetComponent<Button>();
        //dislikeButton = dislikeButton.GetComponent<Button>();
        //likeDisplay.text = numberOfLikes.ToString();
        //dislikeDisplay.text = numberOfDislikes.ToString();
    }

  public void Toggle_Like()
  {
        isLiked = true;
        isDisliked = false;

        UpdateButtons();


    //isLiked =! isLiked; // isLike wordt omgekeerde (true <-> false)
    //Debug.Log(isLiked);
    //if (isDisliked == true) // wanneer disLike == true
    //{
    //  numberOfDislikes--; // -1 Dislike
    //  numberOfLikes++; // +1 Like    
    //  isLiked = true;
    //}
    //if (isLiked == true) // wanneer isLike == true
    //{
    //  numberOfLikes++; // +1 Like
    //}
    //else // wanneer isLike == false
    //{
    //  numberOfLikes--; // -1 Like
    //}
    //isDisliked = false;
    //likeDisplay.text = numberOfLikes.ToString();
    //dislikeDisplay.text = numberOfDislikes.ToString();
    //Debug.Log("isliked1 = " + isLiked);
    //Debug.Log("isDisliked1 = " + isDisliked);

  }

  public void Toggle_Dislike()
  {
        isLiked = false;
        isDisliked = true;
        UpdateButtons();

    //if (isLiked == true)
    //{
    //  numberOfLikes--;
    //  numberOfDislikes++;
    //  isDisliked = true;
    //}
    //isDisliked =! isDisliked;
    //if (isDisliked == true)
    //{
    //  numberOfDislikes++;
    //}
    //else numberOfDislikes--;
    //isLiked = false;
    //dislikeDisplay.text = numberOfDislikes.ToString();
    //likeDisplay.text = numberOfLikes.ToString();
    //Debug.Log("isliked = " + isLiked);
    //Debug.Log("isDisliked = " + isDisliked);
  }

    private void UpdateButtons()
    {
        if (isLiked)
        {
            likeButtonText.text = "";
        }
        else dislikeButtonText.text = "@";
    }
	
	// Update is called once per frame
	void Update () 
  {
        UpdateButtons();
	}
}

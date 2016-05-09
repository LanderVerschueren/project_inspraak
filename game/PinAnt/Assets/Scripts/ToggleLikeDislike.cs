using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class ToggleLikeDislike : MonoBehaviour {



    public Text likeButtonText;
    public Text dislikeButtonText;


    private bool isLiked = false;
    private bool isDisliked = false;


    public void ClickLike()
    {
        if(isLiked == false && isDisliked == false)
        {
            isLiked = true;
        }
        if(isLiked == false && isDisliked == true)
        {
            isLiked = true;
            isDisliked = false;
        }
        checkText();
    }

    public void ClickDislike()
    {
        if (isLiked == false && isDisliked == false)
        {
            isDisliked = true;
        }
        if (isLiked == true && isDisliked == false)
        {
            isLiked = false;
            isDisliked = true;
        }
        checkText();
    }

    void checkText()
    {
        if(isLiked)
        {
            likeButtonText.text = "";
            dislikeButtonText.text = "";
        }
        else if(isDisliked)
        {
            likeButtonText.text = "";
            dislikeButtonText.text = "";
        }
    }


}

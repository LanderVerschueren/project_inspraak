using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class LikeLogic : MonoBehaviour {

    public GameObject GameLogic;

    public GameObject likeButton;
    public GameObject dislikeButton;

    public Sprite likeImage;
    public Sprite likedImage;

    public Sprite dislikeImage;
    public Sprite dislikedImage;



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

        GameLogic.GetComponent<GameLogic>().GainCoins();
        GameLogic.GetComponent<GameLogic>().GainExp();
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
            likeButton.GetComponent<Image>().sprite = likedImage;
            dislikeButton.GetComponent<Image>().sprite = dislikeImage;
        }
        else if(isDisliked)
        {
            likeButton.GetComponent<Image>().sprite = likeImage;
            dislikeButton.GetComponent<Image>().sprite = dislikedImage;
        }
    }


}

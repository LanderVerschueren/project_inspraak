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

    private int nrOfLikes;
    private int nrOfDislikes;

    private bool isLiked = false;
    private bool isDisliked = false;


    public void ClickLike()
    {
        if(isLiked == false && isDisliked == false)
        {
            isLiked = true;
            nrOfLikes++;
        }
        if(isLiked == false && isDisliked == true)
        {
            nrOfLikes++;
            nrOfDislikes--;
            isLiked = true;
            isDisliked = false;
        }

        GameLogic.GetComponent<GameLogic>().GainCoins();
        GameLogic.GetComponent<GameLogic>().GainExp();
        checkText();
    }
    void Start()
    {
      nrOfLikes = int.Parse(likeButton.GetComponentInChildren<Text>().text);
      nrOfDislikes = int.Parse(dislikeButton.GetComponentInChildren<Text>().text);
    }
    public void ClickDislike()
    {
        if (isLiked == false && isDisliked == false)
        {
            isDisliked = true;
            nrOfDislikes++;
        }
        if (isLiked == true && isDisliked == false)
        {
            nrOfLikes--;
            nrOfDislikes--;
            isLiked = false;
            isDisliked = true;
        }
        checkText();
    }

    void checkText()
    {
      Debug.Log("dislikes = " + nrOfDislikes);
      Debug.Log("likes = " + nrOfLikes);

      likeButton.GetComponentInChildren<Text>().text = nrOfLikes.ToString();
      dislikeButton.GetComponentInChildren<Text>().text = nrOfDislikes.ToString();

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

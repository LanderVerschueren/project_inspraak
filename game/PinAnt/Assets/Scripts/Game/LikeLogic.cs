using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class LikeLogic : MonoBehaviour {

    public GameObject original;
    public GameObject GameLogic;

    public GameObject likeButton;
    public GameObject dislikeButton;

    public Sprite likeImage;
    public Sprite likedImage;

    public Sprite dislikeImage;
    public Sprite dislikedImage;

    private int currentProject;
    private int nrOfLikes;
    private int nrOfDislikes;

    private bool isLiked = false;
    private bool isDisliked = false;

    public void ClickLike()
    {
        if (isLiked == true && isDisliked == false)
        {
            nrOfLikes--;
            isLiked = false;
        }
        else if(isLiked == false && isDisliked == false)
        {
            isLiked = true;
            nrOfLikes++;
        }
        else if(isLiked == false && isDisliked == true)
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
      //currentProject = int.Parse(originalProject.name.Replace("Project", "")); //haal projectnr uit naam
      //currentProject = int.Parse(projectOriginal.name.Replace("project", ""));
    }
    public void ClickDislike()
    {
        if (isLiked == false && isDisliked == true)
        {
          nrOfDislikes--;
          isDisliked = false;
        }
        else if (isLiked == false && isDisliked == false)
        {
            isDisliked = true;
            nrOfDislikes++;
        }
        else if (isLiked == true && isDisliked == false)
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
      /*Debug.Log("dislikes = " + nrOfDislikes);
      Debug.Log("likes = " + nrOfLikes);
      Debug.Log("isLiked = " + isLiked);
      Debug.Log("isDisLiked = " + isDisliked);*/

      likeButton.GetComponentInChildren<Text>().text = nrOfLikes.ToString();
      dislikeButton.GetComponentInChildren<Text>().text = nrOfDislikes.ToString();
        if (isLiked == false && isDisliked == false)
        {
          likeButton.GetComponent<Image>().sprite = likeImage;
          dislikeButton.GetComponent<Image>().sprite = dislikeImage;
        }
        else if(isLiked)
        {
            StartCoroutine(PostLike());
            likeButton.GetComponent<Image>().sprite = likedImage;
            dislikeButton.GetComponent<Image>().sprite = dislikeImage;
        }
        else if(isDisliked)
        {
            StartCoroutine(PostDislike());
            likeButton.GetComponent<Image>().sprite = likeImage;
            dislikeButton.GetComponent<Image>().sprite = dislikedImage;
        }
    }

    
  IEnumerator PostLike()
  {
      currentProject = int.Parse(original.name.Replace("Project", ""));
      string likeUrl = "http://bananas.multimediatechnology.be/api/like/"+(currentProject+1);
      //Debug.Log("likeurl = " + likeUrl);

      //reactionForm.AddField("user_id", 0);
      //reactionForm.AddField("fk_user", 3);
      WWW likewww = new WWW(likeUrl);

      yield return likewww;

      if (likewww.error == null)
      {
        //Debug.Log("LIKE OK!: " + likewww.text);
      }
      else
      {
        Debug.Log("LIKE ERROR: " + likewww.error);
      }
    }
  IEnumerator PostDislike()
  {
    currentProject = int.Parse(original.name.Replace("Project", ""));
    string dislikeUrl = "http://bananas.multimediatechnology.be/api/dislike/" + (currentProject + 1);
    //Debug.Log("likeurl = " + likeUrl);

    //reactionForm.AddField("user_id", 0);
    //reactionForm.AddField("fk_user", 3);
    WWW dislikewww = new WWW(dislikeUrl);

    yield return dislikewww;

    if (dislikewww.error == null)
    {
      //Debug.Log("DISLIKE OK!: " + dislikewww.text);
    }
    else
    {
      Debug.Log("DISLIKE ERROR: " + dislikewww.error);
    }
  }
}

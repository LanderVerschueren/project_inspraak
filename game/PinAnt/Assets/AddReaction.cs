using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using System.Collections.Generic;
using System;

public class AddReaction : MonoBehaviour {

  public InputField addReactionField;
  public GameObject content;
  public Button addReactionBtn;
  public GameObject originalPanel;
  public GameObject reactionParent;
  Quaternion rot = new Quaternion(0f, 0f, 0f, 0f);
  public RectTransform oldReactionRect;
  private RectTransform newReactionRect;
  string reaction;
  public static int nrOfReactions;
  public List<GameObject> reactionList;

	// Use this for initialization
	void Start () {

    reactionList = new List<GameObject>();
    
	}
	
	// Update is called once per frame
	void Update () {
	
	}

  public void PlaceReaction()
  {
    GameObject newReaction = GameObject.Instantiate(originalPanel) as GameObject;
    newReaction.name = "Reaction"+ nrOfReactions;

    //afmetingen instellen + onder elkaar schikken
    newReaction.GetComponent<RectTransform>().parent = reactionParent.transform;
    newReaction.GetComponent<RectTransform>().localScale = new Vector3(1f, 1f, 1f);
    newReaction.GetComponent<RectTransform>().sizeDelta = new Vector2(oldReactionRect.rect.width, oldReactionRect.rect.height);
    newReaction.GetComponent<RectTransform>().localPosition = new Vector2(0, -300 * (nrOfReactions));
    newReaction.GetComponentInChildren<Text>().text = addReactionField.text;

    addReactionField.text = "";

    reactionList.Add(newReaction);

    printReactions();

    newReaction.SetActive(true);
    nrOfReactions++;

    Debug.Log(reactionList);

    updateContent();
  }
  public void updateContent()
  {
    if (nrOfReactions > 1)
    {
    content.GetComponent<RectTransform>().offsetMax = new Vector2(content.GetComponent<RectTransform>().offsetMax.x, (content.GetComponent<RectTransform>().offsetMax.y + 370));
    }
  }

  public void printReactions()
  {
    foreach (GameObject reaction in reactionList)
    {
      print(reaction.name + " " + reaction.GetComponentInChildren<Text>().text);
    }
  }
}

public class Reaction
{
  public string id { get; set; }
  public string username { get; set; }
  public string text { get; set; }
}
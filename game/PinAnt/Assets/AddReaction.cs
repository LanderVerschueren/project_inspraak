using UnityEngine;
using System.Collections;
using UnityEngine.UI;

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
  private GameObject[] reactionsArray;

	// Use this for initialization
	void Start () {

    
	}
	
	// Update is called once per frame
	void Update () {
	
	}

  public void PlaceReaction()
  {
    GameObject newReaction = GameObject.Instantiate(originalPanel) as GameObject;
    newReaction.name = "Reaction"+ nrOfReactions;


    newReaction.GetComponent<RectTransform>().parent = reactionParent.transform;
    newReaction.GetComponent<RectTransform>().localScale = new Vector3(1f, 1f, 1f);
    newReaction.GetComponent<RectTransform>().sizeDelta = new Vector2(oldReactionRect.rect.width, oldReactionRect.rect.height);
    newReaction.GetComponent<RectTransform>().localPosition = new Vector2(0, -370 * (nrOfReactions));

    newReaction.GetComponentInChildren<Text>().text = addReactionField.text;
    addReactionField.text = "";

    newReaction.SetActive(true);
    nrOfReactions++;

    updateContent();
  }
  public void updateContent()
  {
    if (nrOfReactions > 1)
    {
    content.GetComponent<RectTransform>().offsetMax = new Vector2(content.GetComponent<RectTransform>().offsetMax.x, (content.GetComponent<RectTransform>().offsetMax.y + 370));
    }
  }
}

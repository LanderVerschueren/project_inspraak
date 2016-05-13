using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class UpdateProfileUI : MonoBehaviour {

    public GameObject PlayerLogic;

    public Text playerName;
    public Text playerRank;
    public Text playerExp;
    public Image rankImg;
    public Text coins;
    public Text aPoints;




	// Use this for initialization
	void Start () {
        PlayerLogic = GameObject.Find("Player");
	}
	
	// Update is called once per frame
	void Update () {
        playerName.text = PlayerLogic.GetComponent<PlayerLogic>().playerName;
        playerRank.text = PlayerLogic.GetComponent<PlayerLogic>().playerRank;
        playerExp.text = PlayerLogic.GetComponent<PlayerLogic>().experiencePoints.ToString();
        rankImg.sprite = PlayerLogic.GetComponent<PlayerLogic>().playerRankImage;
        coins.text = PlayerLogic.GetComponent<PlayerLogic>().playerCoins.ToString() ;
        aPoints.text = PlayerLogic.GetComponent<PlayerLogic>().playerApoints.ToString();

    }
}

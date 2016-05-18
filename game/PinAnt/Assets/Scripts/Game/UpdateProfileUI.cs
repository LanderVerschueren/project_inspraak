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
    public Text coins_main;
    public Text aPoints;




	// Use this for initialization
	void Start () {
        PlayerLogic = GameObject.Find("Player");
	}
	
	// Update is called once per frame
	void Update () {
        playerName.text = PlayerLogic.GetComponent<PlayerSettings>().playerName;
        playerRank.text = PlayerLogic.GetComponent<PlayerSettings>().playerRank;
        playerExp.text = PlayerLogic.GetComponent<PlayerSettings>().experiencePoints.ToString();
        rankImg.sprite = PlayerLogic.GetComponent<PlayerSettings>().playerRankImage;
        coins.text = PlayerLogic.GetComponent<PlayerSettings>().playerCoins.ToString() ;
        aPoints.text = PlayerLogic.GetComponent<PlayerSettings>().playerApoints.ToString();
        coins_main.text = coins.text;
    }
}

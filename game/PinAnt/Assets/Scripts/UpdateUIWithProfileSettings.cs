using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class UpdateUIWithProfileSettings : MonoBehaviour {

    public GameObject player;

    public Text lblPlayerName;
    public Text lblPlayerRank;
    public Text lblPlayerXP;
    public Sprite img_Rank;
    public Text lbl_Coins;
    public Text lbl_Coins_Main;
    public Text lbl_APoints;

    private string pathRankImg;


	// Use this for initialization
	void Start () {
        player = GameObject.Find("Player");
        SetPlayerSettings();
        
	}
	
	// Update is called once per frame
	void Update () {

    }

    public void SetPlayerSettings()
    {
        lblPlayerName.text = player.GetComponent<PlayerSettings>().playerName;
        lblPlayerRank.text = player.GetComponent<PlayerSettings>().playerRank;
        lblPlayerXP.text = player.GetComponent<PlayerSettings>().experiencePoints.ToString();
        pathRankImg = player.GetComponent<PlayerSettings>().playerRankImage;

        img_Rank = Resources.Load("Images" + pathRankImg) as Sprite;
            
        lbl_Coins.text = player.GetComponent<PlayerSettings>().playerCoins.ToString();
        lbl_Coins_Main.text = lbl_Coins.text;
        lbl_APoints.text = player.GetComponent<PlayerSettings>().playerApoints.ToString();
    }



}

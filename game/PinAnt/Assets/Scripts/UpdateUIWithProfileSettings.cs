using UnityEngine;
using UnityEngine.UI;
using System.Collections;
using System.Collections.Generic;
using System.IO;

public class UpdateUIWithProfileSettings : MonoBehaviour {

    public GameObject player;

    public Text lblPlayerName;
    public Text lblPlayerRank;
    public Text lblPlayerXP;
    public Sprite img_Rank;
    public Text lbl_Coins;
    public Text lbl_Coins_Main;
    public Text lbl_APoints;
    public Text lbl_Coins_shop;
    public Text lbl_Apoints_shop;
    public Text lbl_PlayerNameMenu;

    private string pathRankImg;


	// Use this for initialization
	void Start () {

	}
	
	// Update is called once per frame
	void Update () {
        SetPlayerSettingsInUI();
    }

    public void SetPlayerSettingsInUI()
    {
        lblPlayerName.text = player.GetComponent<PlayerSettings>().playerName;
        lblPlayerRank.text = player.GetComponent<PlayerSettings>().playerRank;
        lblPlayerXP.text = player.GetComponent<PlayerSettings>().experiencePoints.ToString();
        pathRankImg = player.GetComponent<PlayerSettings>().playerRankImage;
        
        //img_Rank = Resources.Load(pathRankImg);
        //Debug.Log(img_Rank);

        lbl_Coins.text = player.GetComponent<PlayerSettings>().playerCoins.ToString();
        lbl_Coins_Main.text = lbl_Coins.text;
        lbl_APoints.text = player.GetComponent<PlayerSettings>().playerApoints.ToString();
        lbl_PlayerNameMenu.text = player.GetComponent<PlayerSettings>().playerName;


        lbl_Coins_shop.text = lbl_Coins_Main.text;
        lbl_Apoints_shop.text = lbl_APoints.text;
    }



}

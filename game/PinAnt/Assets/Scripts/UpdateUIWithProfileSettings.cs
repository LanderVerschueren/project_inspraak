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

    public Button btn_MrLike;
    public Button btn_MrDislike;
    public Button btn_CoinUpgrade;
    public Button btn_ExpUpgrade;

    public Text txt_MrLike;
    public Text txt_MrDislike;
    public Text txt_CoinUpgrade;
    public Text txt_ExpUpgrade;

    public Color passiveColor;
    

   

    private string pathRankImg;


	// Use this for initialization
	void Start () {
        InitiializeUpgradeButtons();
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


    private void InitiializeUpgradeButtons()
    {
        if (player.GetComponent<PlayerSettings>().boughtLikeUpgrade == "1")
        {
            txt_MrLike.text = "Gekocht";
            btn_MrLike.interactable = false;
            btn_MrLike.image.color = passiveColor;
        }
        if (player.GetComponent<PlayerSettings>().boughtDislikeUpgrade == "1")
        {
            txt_MrDislike.text = "Gekocht";
            btn_MrDislike.interactable = false;
            btn_MrDislike.image.color = passiveColor;
        }
        if (player.GetComponent<PlayerSettings>().boughtCoinDoubler == "1")
        {
            txt_CoinUpgrade.text = "Gekocht";
            btn_CoinUpgrade.interactable = false;
            btn_CoinUpgrade.image.color = passiveColor;
        }
        if (player.GetComponent<PlayerSettings>().boughtExpDoubler == "1")
        {
            txt_ExpUpgrade.text = "Gekocht";
            btn_ExpUpgrade.interactable = false;
            btn_ExpUpgrade.image.color = passiveColor;
        }
    }



}

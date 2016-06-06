using UnityEngine;
using UnityEngine.UI;
using System.Collections;
using System.Collections.Generic;

public class PlayerSettings : MonoBehaviour {
    public GameObject PostPlayer;
    //Player settings
    public string playerId;
    public string playerName;
    public int playerLevel;
    public string playerRank;
    public string playerRankImage;
    public int experiencePoints;
    public int playerCoins;
    public int playerApoints;
    public double coinMultiplier;

    //upgrades
    public string boughtLikeUpgrade;
    public string boughtDislikeUpgrade;
    public string boughtCoinDoubler;
    public string boughtExpDoubler;

    //game variables
    public int expPerLike;
    public int expPerDislike;
    public int coinsPerLike;
    public int coinsPerDislike;

    public List <int> likedProjects = new List<int>();

    // Use this for initialization
    void Start () {
        playerId = LoadPlayerSettings.playerId;
        playerName = LoadPlayerSettings.playerName;
        playerLevel = LoadPlayerSettings.playerLevel;
        playerRank = LoadPlayerSettings.playerRank;
        playerRankImage = LoadPlayerSettings.playerRankImage;
        experiencePoints = LoadPlayerSettings.playerXP;
        playerCoins = LoadPlayerSettings.playerCoins;
        playerApoints = LoadPlayerSettings.playerApoints;
       
        boughtLikeUpgrade = LoadPlayerSettings.boughtLikeUpgrade;
        boughtDislikeUpgrade = LoadPlayerSettings.boughtDislikeUpgrade;
        boughtCoinDoubler = LoadPlayerSettings.boughtCoinDoubler;
        boughtExpDoubler = LoadPlayerSettings.boughtExpDoubler;

        expPerLike = LoadPlayerSettings.expPerLike;
        expPerDislike = LoadPlayerSettings.expPerDislike;
        coinsPerLike = LoadPlayerSettings.coinPerLike;
        coinsPerDislike = LoadPlayerSettings.coinPerDislike;

        if(boughtLikeUpgrade == "0")
        {
            coinsPerLike = 2;
        }
        if(boughtDislikeUpgrade == "0")
        {
            coinsPerDislike = 1;
        }



        GetComponent<UpdateUIWithProfileSettings>().SetPlayerSettingsInUI();
        PostSettings();

    }
	
	// Update is called once per frame
	void Update () {

        
	}
    
    public void PostSettings()
    {
        PostPlayer.GetComponent<PostPlayerSettings>().updateLevel(playerLevel);
        PostPlayer.GetComponent<PostPlayerSettings>().updateRank(playerRank);
        PostPlayer.GetComponent<PostPlayerSettings>().updateRankImage(playerRankImage);
        PostPlayer.GetComponent<PostPlayerSettings>().updateXP(experiencePoints);
        PostPlayer.GetComponent<PostPlayerSettings>().updateCoins(playerCoins);
        PostPlayer.GetComponent<PostPlayerSettings>().updateAPoints(playerApoints);
        //PostPlayer.GetComponent<PostPlayerSettings>().setBoughtCoinDoubler(boughtCoinDoubler);
        //PostPlayer.GetComponent<PostPlayerSettings>().setBoughtLikeUpgrade();
        //PostPlayer.GetComponent<PostPlayerSettings>().setBoughtDislikeUpgrade();
        //PostPlayer.GetComponent<PostPlayerSettings>().setBoughtExpDoubler();
        PostPlayer.GetComponent<PostPlayerSettings>().setExpPerLike(expPerLike);
        PostPlayer.GetComponent<PostPlayerSettings>().setExpPerDislike(expPerDislike);
        PostPlayer.GetComponent<PostPlayerSettings>().setCoinsPerLike(coinsPerLike);
        PostPlayer.GetComponent<PostPlayerSettings>().setCoinsPerDislike(coinsPerDislike);

    }
    

}

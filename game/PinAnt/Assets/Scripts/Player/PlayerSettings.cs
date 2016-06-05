using UnityEngine;
using UnityEngine.UI;
using System.Collections;
using System.Collections.Generic;

public class PlayerSettings : MonoBehaviour {

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
    public bool boughtLikeUpgrade;
    public bool boughtDislikeUpgrade;
    public bool boughtCoinDoubler;
    public bool boughtExpDoubler;

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
       
         //NOG OP TE LADEN UIT DATABASE!!!
        boughtLikeUpgrade = false;
        boughtDislikeUpgrade = false;
        boughtCoinDoubler = false;
        boughtExpDoubler = false;

        expPerLike = LoadPlayerSettings.
        expPerDislike = 2;
        coinsPerLike = 2;
        coinsPerDislike = 1;



        GetComponent<UpdateUIWithProfileSettings>().SetPlayerSettingsInUI();

	}
	
	// Update is called once per frame
	void Update () {
	
	}
    
    
    

}

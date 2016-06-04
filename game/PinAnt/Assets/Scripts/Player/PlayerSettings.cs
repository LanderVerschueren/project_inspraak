using UnityEngine;
using UnityEngine.UI;
using System.Collections;
using System.Collections.Generic;

public class PlayerSettings : MonoBehaviour {

    //Player settings
    public string playerName;
    public int playerLevel;
    public string playerRank;
    public string playerRankImage;
    public int experiencePoints;
    public int playerCoins;
    public int playerApoints;
    public double coinMultiplier;

    public List <int> LikedProjects = new List<int>();

    // Use this for initialization
    void Start () {
        playerName = LoadPlayerSettings.playerName;
        playerLevel = LoadPlayerSettings.playerLevel;
        playerRank = LoadPlayerSettings.playerRank;
        playerRankImage = LoadPlayerSettings.playerRankImage;
        experiencePoints = LoadPlayerSettings.playerXP;
        playerCoins = LoadPlayerSettings.playerCoins;
        playerApoints = LoadPlayerSettings.playerApoints;
        coinMultiplier = LoadPlayerSettings.coinMultiplier;

        GetComponent<UpdateUIWithProfileSettings>().SetPlayerSettingsInUI();
	}
	
	// Update is called once per frame
	void Update () {
	
	}
    
    
    

}

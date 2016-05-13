using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class GameLogic : MonoBehaviour {

    public Sprite imgLvl1;
    public Sprite imgLvl2;
    public Sprite imgLvl3;
    public Sprite imgLvl4;
    public Sprite imgLvl5;
    public Sprite imgLvl6;
    public Sprite imgLvl7;
    public Sprite imgLvl8;
    public Sprite imgLvl9;
    public Sprite imgLvl10;









    private GameObject Player;

    private string[] ranks = { "Landbouwer I", "Landbouwer II", "Landbouwer III", "Burger I", "Burger II", "Burger III", "Hertog", "Graaf", "Baron", "Heerser" };
   
    private int[] xpNeeded = {100, 200, 300, 500, 600, 700, 1000, 1500, 2000, 3000};
    private double[] CoinMultipliers = { 0, 1.1, 1.1, 1.3, 1.3, 1.3, 1.5, 1.6, 1.8, 2 };

    private int level;
    private string rank;
    private Sprite rankImg;
    private int xp;
    private int coins;
    private double multiplier;
    private int aPoints;

    // Use this for initialization
    void Start()
    {
        Player = GameObject.Find("Player");

        InitializePlayerSettings();

        level = Player.GetComponent<PlayerLogic>().playerLevel;
        rank = Player.GetComponent<PlayerLogic>().playerRank;
        xp = Player.GetComponent<PlayerLogic>().experiencePoints;
        coins = Player.GetComponent<PlayerLogic>().playerCoins;
        aPoints = Player.GetComponent<PlayerLogic>().playerApoints;
    }
	// Update is called once per frame
	void Update () {
        
    }

    public void UpdatePlayerSettings()
    {
        Player.GetComponent<PlayerLogic>().playerLevel = level;
        Player.GetComponent<PlayerLogic>().playerRank = rank;
        Player.GetComponent<PlayerLogic>().playerRankImage = rankImg;
        Player.GetComponent<PlayerLogic>().playerCoins = coins;
        Player.GetComponent<PlayerLogic>().experiencePoints = xp;
        Player.GetComponent<PlayerLogic>().playerApoints = aPoints;
    }

    public void InitializePlayerSettings()
    {
        //normaal uit database halen
        xp = 0;
        aPoints = 0;
        DetermineLevel(xp);
        UpdatePlayerSettings();
    }

    private void DetermineLevel(int xp)
    {

        
  //juiste ranking bepalen....zucht 

            switch(level)
            {
                case 1:
                    rankImg = imgLvl1;
                    return;
                case 2:
                    rankImg = imgLvl2;
                    return;
                case 3:
                    rankImg = imgLvl3;
                    return;
                case 4:
                    rankImg = imgLvl4;
                    return;
                case 5:
                    rankImg = imgLvl5;
                    return;
                case 6:
                    rankImg = imgLvl6;
                    return;
                case 7:
                    rankImg = imgLvl7;
                    return;
                case 8:
                    rankImg = imgLvl8;
                    return;
                case 9:
                    rankImg = imgLvl9;
                    return;
                case 10:
                    rankImg = imgLvl10;
                    return;
                }
        


    }

    public void GainExp()
    {
        xp += 10;
        DetermineLevel(xp);
        UpdatePlayerSettings();
    }
    public void GainCoins()
    {
        coins += 10;
        DetermineLevel(xp);
        UpdatePlayerSettings();
    }
    
}

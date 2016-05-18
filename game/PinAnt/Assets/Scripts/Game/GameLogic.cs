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

    private string[] ranks = { "Level I", "Level II", "Level III", "Level IV", "Level V", "Level VI", "Level VII", "Level VIII", "Level IX", "Level X" };
   
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

        level = Player.GetComponent<PlayerSettings>().playerLevel;
        rank = Player.GetComponent<PlayerSettings>().playerRank;
        xp = Player.GetComponent<PlayerSettings>().experiencePoints;
        coins = Player.GetComponent<PlayerSettings>().playerCoins;
        aPoints = Player.GetComponent<PlayerSettings>().playerApoints;
    }
	// Update is called once per frame
	void Update () {
        
    }

    public void UpdatePlayerSettings()
    {
        Player.GetComponent<PlayerSettings>().playerLevel = level;
        Player.GetComponent<PlayerSettings>().playerRank = rank;
        Player.GetComponent<PlayerSettings>().playerRankImage = rankImg;
        Player.GetComponent<PlayerSettings>().playerCoins = coins;
        Player.GetComponent<PlayerSettings>().experiencePoints = xp;
        Player.GetComponent<PlayerSettings>().playerApoints = aPoints;
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

        for(int i = 0; i < xpNeeded.Length; i++)
        {
            if (xp > xpNeeded[i] && xp < xpNeeded[i + 1])
            {
                level = i + 1;
            }
            else if (xp < xpNeeded[i])
            {
                level = i + 1;
                break;
            }

        }

        rank = ranks[level - 1];
        

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
        xp += 5;
        DetermineLevel(xp);
        UpdatePlayerSettings();
    }
    public void GainCoins()
    {
        coins += 2;
        DetermineLevel(xp);
        UpdatePlayerSettings();
    }
    
}

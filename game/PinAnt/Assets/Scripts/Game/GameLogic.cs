using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class GameLogic : MonoBehaviour {

   private GameObject Player;

    private string[] ranks = { "Level I", "Level II", "Level III", "Level IV", "Level V", "Level VI", "Level VII", "Level VIII", "Level IX", "Level X" };
   
    private int[] xpNeeded = {100, 200, 300, 500, 600, 700, 1000, 1500, 2000, 3000};

   

    
    

    // Use this for initialization
    void Start()
    {

        
        Player = GameObject.Find("Player");



        
    }
	// Update is called once per frame
	void Update () {
    }
    //shortcuts to playersettings
        //Player.GetComponent<PlayerSettings>().playerLevel = level;
        //Player.GetComponent<PlayerSettings>().playerRank = rank;
        //Player.GetComponent<PlayerSettings>().playerRankImage = rankImg;
        //Player.GetComponent<PlayerSettings>().playerCoins = coins;
        //Player.GetComponent<PlayerSettings>().experiencePoints = xp;
        //Player.GetComponent<PlayerSettings>().playerApoints = aPoints;
        //Player.GetComponent<PlayerSettings>().coinMultiplier = multiplier;
    

    private void DetermineLevel(int xp)
    {

        for(int i = 0; i < xpNeeded.Length; i++)
        {
            if(xp >= xpNeeded[9])
            {
                Player.GetComponent<PlayerSettings>().playerLevel = xpNeeded.Length;
            }
            else if (xp >= xpNeeded[i] && xp < xpNeeded[i + 1])
            {
                Player.GetComponent<PlayerSettings>().playerLevel = i + 1;
            }
            else if (xp < xpNeeded[i])
            {
                Player.GetComponent<PlayerSettings>().playerLevel = i + 1;
                break;
            }

        }

        Player.GetComponent<PlayerSettings>().playerRank = ranks[Player.GetComponent<PlayerSettings>().playerLevel - 1];

        Player.GetComponent<PlayerSettings>().playerRankImage = "imglvl" + Player.GetComponent<PlayerSettings>().playerLevel.ToString();
            
        


    }

    public void GainLikeExp()
    {
        int xp = Player.GetComponent<PlayerSettings>().expPerLike;
        if (Player.GetComponent<PlayerSettings>().boughtExpDoubler)
        { xp = xp * 2; }
        Player.GetComponent<PlayerSettings>().experiencePoints += xp;
        DetermineLevel(Player.GetComponent<PlayerSettings>().experiencePoints);
    }
    public void GainLikeCoins()
    {
        int coins = Player.GetComponent<PlayerSettings>().coinsPerLike;
        if (Player.GetComponent<PlayerSettings>().boughtCoinDoubler)
        { coins = coins * 2; }
        Player.GetComponent<PlayerSettings>().playerCoins += coins;
    }
    public void GainDislikeExp()
    {
        int xp = Player.GetComponent<PlayerSettings>().expPerDislike;
        if (Player.GetComponent<PlayerSettings>().boughtExpDoubler)
        { xp = xp * 2; }
        Player.GetComponent<PlayerSettings>().experiencePoints += xp;
        DetermineLevel(Player.GetComponent<PlayerSettings>().experiencePoints);
    }
    public void GainDislikeCoins()
    {
        int coins = Player.GetComponent<PlayerSettings>().coinsPerDislike;
        if (Player.GetComponent<PlayerSettings>().boughtCoinDoubler)
        { coins = coins * 2; }
        Player.GetComponent<PlayerSettings>().playerCoins += coins;
    }
}

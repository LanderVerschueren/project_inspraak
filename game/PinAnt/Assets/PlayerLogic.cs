using UnityEngine;
using System.Collections;

public class PlayerLogic : MonoBehaviour {

    //Player settings
    private string playerName;
    private string playerPassword;
    private int playerLevel;
    private string playerRank;
    private int experiencePoints;
    private int playerCoins;
    private int playerApoints;
    private int coinMultiplier;

	// Use this for initialization
	void Start () {
	
	}
	
	// Update is called once per frame
	void Update () {
	
	}

    //set variables

    public void SetPlayerName(string pName)
    { playerName = pName; }

    public void SetPlayerPassword(string pPassword)
    { playerPassword = pPassword; }

    public void SetPlayerLevel(int pLevel)
    { playerLevel = pLevel;  }

    public void SetPlayerRank(string pRank)
    { playerRank = pRank;    }

    public void SetExperiencePoints(int xp)
    { experiencePoints = xp; }
     
    public void SetCoins(int pCoins)
    { playerCoins = pCoins; }

    public void SetAPoints( int APoints)
    { playerApoints = APoints; }

    public void SetCoinMultiplier(int coinMulti)
    { coinMultiplier = coinMulti; }

    //get veriables
    public void GetPlayerName()
    { return ; }

    public void GetPlayerName()
    { return; }

    public void GetPlayerName()
    { return; }

    public void GetPlayerName()
    { return; }

    public void GetPlayerName()
    { return; }

    public void GetPlayerName()
    { return; }

    public void GetPlayerName()
    { return; }

    public void GetPlayerName()
    { return; }

}

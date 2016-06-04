using UnityEngine;
using System.Collections;

public class LoadPlayerSettings : MonoBehaviour {

  public static string playerId;
  public static string playerName;
  public static string playerEmail;
  public static string playerType;
  public static int playerLevel;
  public static string playerRank;
  public static string playerRankImage;
  public static int playerXP;
  public static int playerCoins;
  public static float coinMultiplier;
  public static int playerApoints;
  public static string playerCreatedAt;
  public static string playerUpdatedAt;


	// Use this for initialization
	void Start () 
  {
    LoadPlayer();
	}

  void LoadPlayer()
  {
    Debug.Log("LOADPLAYER");
    playerId = PostPlayerSettings.playerData["user"]["id"].ToString();
    playerName = PostPlayerSettings.playerData["user"]["name"].ToString();
    playerEmail = PostPlayerSettings.playerData["user"]["email"].ToString();
    playerType = PostPlayerSettings.playerData["user"]["type_of_user"].ToString();
    playerLevel = int.Parse(PostPlayerSettings.playerData["user"]["level"].ToString());
    playerRank = PostPlayerSettings.playerData["user"]["rank"].ToString();
    playerRankImage = PostPlayerSettings.playerData["user"]["path_rank_image"].ToString();
    playerXP = int.Parse(PostPlayerSettings.playerData["user"]["XP"].ToString());
    playerCoins = int.Parse(PostPlayerSettings.playerData["user"]["coins"].ToString());
    coinMultiplier = float.Parse(PostPlayerSettings.playerData["user"]["coin_multiplier"].ToString());
    playerApoints = int.Parse(PostPlayerSettings.playerData["user"]["a_points"].ToString());
    playerCreatedAt = null; //PostPlayerSettings.playerData["created_at"].ToString();
    playerUpdatedAt = null; // PostPlayerSettings.playerData["updated_at"].ToString();
    //Debug.Log(playerId + " " + playerName + " " + playerEmail + " " + playerType + " " + playerLevel + " " + playerRank + " " + playerXP + " " + playerCoins + " " + coinMultiplier + " " + playerApoints + " " + playerCreatedAt + " " + playerUpdatedAt);
  }

	// Update is called once per frame
	void Update () {
	
	}
  public class Player
  {
    public string id { get; set; }
    public string title { get; set; }
    public string category { get; set; }
    public string info { get; set; }
    public string photoname { get; set; }
    public string endDate { get; set; }
    public string price { get; set; }
    public string phase { get; set; }
    public string likes { get; set; }
    public string dislikes { get; set; }
    public string views { get; set; }
    public string created_at { get; set; }
    public string updated_at { get; set; }
    public string question { get; set; }
  }

}

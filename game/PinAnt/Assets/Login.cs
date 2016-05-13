using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class Login : MonoBehaviour {


    public GameObject Player;
    public GameObject GameLogic;


    public InputField inputUsername;
    public InputField inputPassword;

    public string playerUsername;
    public string playerPassword;
    
    void Start()
    {
        Player = GameObject.Find("Player");
        GameLogic = GameObject.Find("GameLogic");
    }
	

    public void Player_Login()
    {
        playerUsername = inputUsername.text;
        playerPassword = inputPassword.text;

        Player.GetComponent<PlayerLogic>().playerName = playerUsername;
        Player.GetComponent<PlayerLogic>().playerPassword = playerPassword;

        GameLogic.GetComponent<GameLogic>().InitializePlayerSettings();
    }
}

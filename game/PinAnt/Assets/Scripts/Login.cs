using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class Login : MonoBehaviour {


    public GameObject Player;
    public GameObject GameLogic;
    public GameObject UIlogic;


    public InputField inputUsername;
    public InputField inputPassword;

    public GameObject error1;
    public GameObject error2;
    public GameObject errormsg;

    public GameObject MainCanvas;
    public GameObject IntroCanvas;


    public string playerUsername;
    public string playerPassword;
    
    void Start()
    {
        Player = GameObject.Find("Player");
        GameLogic = GameObject.Find("GameLogic");
        UIlogic = GameObject.Find("UILogic");
    }
	

    public void Player_Login()
    {
        playerUsername = inputUsername.text;
        playerPassword = inputPassword.text;

        if(playerUsername == " " || playerUsername == "" || playerPassword == "" || playerPassword == " ")
        {
            error1.SetActive(true);
            error2.SetActive(true);
            errormsg.SetActive(true);
        }
        else
        {
            Player.GetComponent<PlayerSettings>().playerName = playerUsername;
            Player.GetComponent<PlayerSettings>().playerPassword = playerPassword;

            GameLogic.GetComponent<GameLogic>().InitializePlayerSettings();

            UIlogic.GetComponent<UILogic>().OpenTab(MainCanvas);
            UIlogic.GetComponent<UILogic>().CloseTab(IntroCanvas);

        }        
    }
}

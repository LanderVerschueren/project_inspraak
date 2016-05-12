using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class Login : MonoBehaviour {


    public GameObject Player;

    public InputField inputUsername;
    public InputField inputPassword;

    public string playerUsername;
    public string playerPassword;
    

	

    public void Player_Login()
    {
        playerUsername = inputUsername.text;
        playerPassword = inputPassword.text;

        Player.GetComponent("PlayerLogic").SendMessage("pName." + playerUsername);


        Debug.Log(playerUsername);
        Debug.Log(playerPassword);
    }
}

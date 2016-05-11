using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class Login : MonoBehaviour {


    public GameObject Player;
    public InputField inputUsername;
    public InputField inputPassword;

    public string playerUsername;
    public string playerPassword;
    

	// Use this for initialization
	void Start () {
       
	}
	
	// Update is called once per frame
	void Update () {
	
	}

    public void Player_Login()
    {
        playerUsername = inputUsername.text;
        playerPassword = inputPassword.text;

        Player.GetComponent("getplayersettings").SendMessage("setName", playerUsername);


        Debug.Log(playerUsername);
        Debug.Log(playerPassword);
    }
}

using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using LitJson;

public class PostPlayerSettings : MonoBehaviour {

  public InputField usernameField;
  public InputField passwordField;
  public InputField nameField;

  public static JsonData playerToken;

  private string playerName;
  private string playerEmail;
  private string playerPassword;

	// Use this for initialization
	public void Start () {

    

    playerName = "Bert5";
    playerEmail = "bert.vanhove@live.be5";
    playerPassword = "wachtwoord";



    
	}
	
	// Update is called once per frame
	void Update () {
	
	}

  public void LoginPlayer()
  {
    string loginUrl = "http://bananas.multimediatechnology.be/api/login";

    WWWForm loginForm = new WWWForm();
    loginForm.AddField("email", playerEmail);
    loginForm.AddField("password", playerPassword);

    WWW loginwww = new WWW(loginUrl, loginForm);

    StartCoroutine(PostPlayer(loginwww));
  }

  public void RegisterPlayer()
  {
    string RegisterUrl = "http://bananas.multimediatechnology.be/api/register";

    WWWForm RegisterForm = new WWWForm();
    RegisterForm.AddField("name", playerName);
    RegisterForm.AddField("email", playerEmail);
    RegisterForm.AddField("password", playerPassword);

    WWW registerwww = new WWW(RegisterUrl, RegisterForm);

    StartCoroutine(PostPlayer(registerwww));
  }

  IEnumerator PostPlayer(WWW www)
  {
    yield return www;

    if (www.error == null)
    {
      Debug.Log("WWW OK!: " + www.text);
      playerToken = JsonMapper.ToObject(www.text);
      Debug.Log(playerToken[0]);
    }
    else
    {
      Debug.Log("WWW ERROR: " + www.error);
    }
  }
}

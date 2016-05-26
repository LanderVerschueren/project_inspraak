using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class PostPlayerSettings : MonoBehaviour {

  public InputField usernameField;
  public InputField passwordField;
  public InputField nameField;

  private string playerName;
  private string playerEmail;
  private string playerPassword;

	// Use this for initialization
	public void Start () {

    string url = "http://bananas.multimediatechnology.be/login";

    playerName = "Bert";
    playerEmail = "bert.vanhove@live.be";
    playerPassword = "wachtwoord";

    WWWForm form = new WWWForm();
    form.AddField("name", playerName);
    form.AddField("email", playerEmail);
    form.AddField("password", playerPassword);

    form.AddField("email", "mazurek.piotr@student.kdg.be");
    form.AddField("password", "projectant");

    WWW www = new WWW(url, form);

    StartCoroutine(RegisterPlayer(www));
	}
	
	// Update is called once per frame
	void Update () {
	
	}

  IEnumerator RegisterPlayer(WWW www)
  {
    yield return www;

    if (www.error == null)
    {
      Debug.Log("WWW OK!: " + www.text);
    }
    else
    {
      Debug.Log("WWW ERROR: " + www.error);
    }
  }
}

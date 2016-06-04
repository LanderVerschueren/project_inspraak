using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using LitJson;
using System.Collections.Generic;
using System.Linq;

public class PostPlayerSettings : MonoBehaviour
{

  public InputField usernameField;
  public InputField passwordField;
  public InputField emailField;
  public InputField passwordRepeatField;

  public GameObject introCanvas;
  public GameObject mainCanvas;

  public GameObject error1;
  public GameObject error2;
  public GameObject error3;
  public GameObject error4;
  public GameObject errormsg;

  public GameObject player;

  public static JsonData playerToken;
  public static JsonData playerData;

  private string playerName;
  private string playerEmail;
  private string playerPassword;
  private string playerPasswordRepeat;

  // Use this for initialization
  public void Start()
  {

  }
  public void CheckRegisterFields()
  {
    playerEmail = emailField.text;
    playerPassword = passwordField.text;
    playerPasswordRepeat = passwordRepeatField.text;
    playerName = usernameField.text;

    if (ValidateInformation())
    {
      RegisterPlayer(playerName, playerEmail, playerPassword);
    }
  }

  bool ValidateInformation()
  {
    bool check1 = false;
    bool check2 = false;
    bool check3 = false;
    bool check4 = false;

    if (playerName == "" || playerName == " " || playerName == "  ")
    {
      ShowError1();
    }
    else
    {
      check1 = true;
      error1.SetActive(false);
    }
    if (playerEmail.Contains("@") && playerEmail.Contains("."))
    {
      check2 = true;
      error2.SetActive(false);
    }
    else ShowError2();

    if (playerPassword == " " || playerPassword == "")
    {
      ShowError3();
    }
    else
    {
      check3 = true;
      error3.SetActive(false);
    }

    if (playerPassword != playerPasswordRepeat)
    {
      ShowError4();
    }
    else
    {
      error4.SetActive(false);
      check4 = true;
    }

    if (check1 && check2 && check3 && check4)
    {
      return true;
    }
    else return false;
  }

  void ShowError1()
  {
    error1.SetActive(true);
  }

  void ShowError2()
  {
    error2.SetActive(true);
  }

  void ShowError3()
  {
    error3.SetActive(true);
  }

  void ShowError4()
  {
    error4.SetActive(true);
  }

  void resetError()
  {
    error1.SetActive(false);
    error2.SetActive(false);
    error3.SetActive(false);
    error4.SetActive(false);
  }

  public void CheckLogInFields()
  {
    error1.SetActive(false);
    error2.SetActive(false);
    errormsg.SetActive(false);

    playerEmail = "mazurek.piotr@student.kdg.be";////emailField.text;
    playerPassword = "projectant";//passwordField.text; 

    if (playerEmail != "")
    {
      LoginPlayer(playerEmail, playerPassword);
    }
    else
    {
      errormsg.GetComponent<Text>().text = "Inloggegevens zijn ongeldig";
      error1.SetActive(true);
      error2.SetActive(true);
      errormsg.SetActive(true);
    }
  }

  // Update is called once per frame
  void Update()
  {

  }

  public void LoginPlayer(string email, string password)
  {
    //Debug.Log("loginplayer");
    string loginUrl = "http://bananas.multimediatechnology.be/api/login";

    WWWForm loginForm = new WWWForm();
    loginForm.AddField("email", email);
    loginForm.AddField("password", password);

    WWW loginwww = new WWW(loginUrl, loginForm);

    StartCoroutine(PostPlayerLogin(loginwww));
  }

  IEnumerator PostPlayerLogin(WWW www)
  {
    //Debug.Log("postplayer");
    yield return www;

    if (www.error == null)
    {
      Debug.Log("WWW OK!: " + www.text);
      playerToken = JsonMapper.ToObject(www.text);
      StartCoroutine(postToken());
      error1.SetActive(false);
      error2.SetActive(false);
      errormsg.SetActive(false);
    }
    else
    {
      Debug.Log("WWW ERROR: " + www.error);
      errormsg.GetComponent<Text>().text = "Inloggegevens zijn ongeldig";
      error1.SetActive(true);
      error2.SetActive(true);
      errormsg.SetActive(true);
    }
  }

  IEnumerator postToken()
  {
    WWWForm tokenForm = new WWWForm();
    tokenForm.AddField("name", "value");

    Dictionary<string, string> headers = tokenForm.headers;
    /*Hashtable headers = new Hashtable();
    headers.Add("Authorization", "Bearer: " + playerToken[0].ToString());*/
    string url = "http://bananas.multimediatechnology.be/api/user";

    headers["Authorization"] = "Bearer: " + playerToken[0].ToString();

    WWW www = new WWW(url, null, headers);
    yield return www;

    if (www.error == null)
    {
      Debug.Log("POSTTOKEN OK!: " + www.text);
      playerData = JsonMapper.ToObject(www.text);
      player.SetActive(true);
      introCanvas.SetActive(false);
      mainCanvas.SetActive(true);
    }
    else
    {
      Debug.Log("POSTTOKEN ERROR: " + www.error);
    }
  }

  public void RegisterPlayer(string name, string email, string password)
  {
    string RegisterUrl = "http://bananas.multimediatechnology.be/api/register";

    WWWForm RegisterForm = new WWWForm();
    RegisterForm.AddField("name", name);
    RegisterForm.AddField("email", email);
    RegisterForm.AddField("password", password);

    WWW registerwww = new WWW(RegisterUrl, RegisterForm);

    StartCoroutine(PostPlayerLogin(registerwww));
  }
}

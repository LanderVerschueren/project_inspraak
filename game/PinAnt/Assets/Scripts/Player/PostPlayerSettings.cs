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

  public static JsonData playerTokenJSON;
  public static JsonData playerData;

  public static string playerToken;

  private string playerName;
  private string playerEmail;
  private string playerPassword;
  private string playerPasswordRepeat;

  private string userLink;
  private string addCoinsLink;
  private string removeCoinsLink;
  private string addXPLink;
  private string removeXPLink;
  private string addLevelLink;
  private string updateImageLink;
  private string addAPointsLink;
  private string removeAPointsLink;
  private string updateRankLink;
  private string updateCoinMultiplierLink;

  // Use this for initialization
  public void Start()
  {
    userLink = "http://bananas.multimediatechnology.be/api/user";
    addCoinsLink = "http://bananas.multimediatechnology.be/api/addCoins/";
    removeCoinsLink = "http://bananas.multimediatechnology.be/api/removeCoins/";
    addXPLink = "http://bananas.multimediatechnology.be/api/addXP/";
    addLevelLink = "http://bananas.multimediatechnology.be/api/addLevel";
    updateImageLink = "http://bananas.multimediatechnology.be/api/rankImage/";
    addAPointsLink = "http://bananas.multimediatechnology.be/api/addPoints";
    removeAPointsLink = "http://bananas.multimediatechnology.be/api/removePoints";
    updateCoinMultiplierLink = "http://bananas.multimediatechnology.be/api/multiplier/";
    //updateRankLink = "http://bananas.multimediatechnology.be/api/";
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

    playerEmail = emailField.text;
    playerPassword = passwordField.text; 

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

  public IEnumerator PostPlayerLogin(WWW www)
  {
    //Debug.Log("postplayer");
    yield return www;

    if (www.error == null)
    {
      Debug.Log("LOGINWWW OK!: " + www.text);
      playerTokenJSON = JsonMapper.ToObject(www.text);
      playerToken = playerTokenJSON["token"].ToString();

      StartCoroutine(postToken(userLink, playerToken));

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

  public IEnumerator postToken(string url, string token)
  {
    WWWForm tokenForm = new WWWForm();
    tokenForm.AddField("name", "value");

    Dictionary<string, string> headers = new Dictionary<string, string>(tokenForm.headers);

    byte[] rawData = tokenForm.data;

    /*Hashtable headers = new Hashtable();
    headers.Add("Authorization", "Bearer: " + playerToken[0].ToString());*/
    //Debug.Log("url =" + url);
    headers["Authorization"] = "Bearer: " + token;
    //Debug.Log(headers["Authorization"]);

    WWW www = new WWW(url, rawData, headers);
    yield return www;

    if (www.error == null)
    {
      Debug.Log("POSTTOKEN OK!: " + www.text);
      if (url == userLink)
      {
        playerData = JsonMapper.ToObject(www.text);
        playerToken = playerData["token"].ToString();
        player.SetActive(true);
        introCanvas.SetActive(false);
      }
      else
      {
        playerTokenJSON = JsonMapper.ToObject(www.text);
        playerToken = playerTokenJSON["token"].ToString();
      }
    }
    else
    {
      Debug.Log("POSTTOKEN ERROR: " + www.error);
    }
  }

  public void addCoins2()
  {
    Debug.Log("token = " + playerToken);
  }

  public string setToken(WWW www)
  {
    playerData = JsonMapper.ToObject(www.text);
    playerToken = playerData["token"].ToString();
    return playerToken;
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

  public void clickCoins()
  {
    addCoins(2);
  }

  public void clickAddXP()
  {
    addXP(50);
  }

  public void clickRemoveCoins()
  {
    removeCoins(20);
  }

  public void clickXP()
  {
 
  }

  public void addCoins(int nrOfCoinsToAdd)
  {
    Debug.Log("updatecoins" + "token = " + playerToken);
    Debug.Log(addCoinsLink + nrOfCoinsToAdd);
    StartCoroutine(postToken(addCoinsLink + nrOfCoinsToAdd, playerToken));
  }

  public void removeCoins(int nrOfCoinsToRemove)
  {
    Debug.Log("removeCoins");

    StartCoroutine(postToken(removeCoinsLink + nrOfCoinsToRemove, playerToken));
  }

  public void updateLevel(int newLevel)
  {
    StartCoroutine(postToken(addLevelLink + newLevel, playerToken));
  }

  public void addXP(int nrOfXPToAdd)
  {
    Debug.Log("addxp");
    StartCoroutine(postToken(addXPLink + nrOfXPToAdd, playerToken));
  }

  public void addAPoints(int nrOfAPointsToAdd)
  {
    StartCoroutine(postToken(addAPointsLink + nrOfAPointsToAdd, playerToken));
  }

  public void removeAPoints(int nrOfAPointsToAdd)
  {
    StartCoroutine(postToken(addAPointsLink + nrOfAPointsToAdd, playerToken));
  }

  public void updateImagePath(string newImagePath)
  {
    StartCoroutine(postToken(updateImageLink + newImagePath, playerToken));
  }

  public void updateCoinMultiplier(float newCointMultiplier)
  {
    StartCoroutine(postToken(updateCoinMultiplierLink + newCointMultiplier, playerToken));
  }

  public void updateRank(string newRank)
  {
    StartCoroutine(postToken(updateRankLink + newRank, playerToken));
  }
}

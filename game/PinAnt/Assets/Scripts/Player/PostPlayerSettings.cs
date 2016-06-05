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
  public GameObject originalProject;

  public GameObject error1;
  public GameObject error2;
  public GameObject error3;
  public GameObject error4;
  public GameObject errormsg;

  public GameObject player;

  public static JsonData playerTokenJSON;
  public static JsonData playerData;

  public static string playerToken;

  private static string playerName;
  private static string playerEmail;
  private static string playerPassword;
  private static string playerPasswordRepeat;

  /*
  private string addCoinsLink;
  private string removeCoinsLink;
  private string addXPLink;
  private string removeXPLink;
  private string addLevelLink;
  private string updateImageLink;
  private string addAPointsLink;
  private string removeAPointsLink;
  private string updateRankLink;
  private string updateCoinMultiplierLink;*/

  private string userLink;
  private string coinsLink;
  private string xpLink;
  private string levelLink;
  private string rankLink;
  private string imageLink;
  private string multiplierLink;
  private string aPointsLink;

  private string coinDoublerLink;
  private string expDoublerLink;
  private string likeUpgradeLink;
  private string dislikeUpgradeLink;
  private string expPerLikeLink;
  private string expPerDisLikeLink;
  private string coinPerLikeLink;
  private string coinPerDislikeLink;

  // Use this for initialization
  public void Start()
  {
    /*
    addCoinsLink = "http://bananas.multimediatechnology.be/api/addCoins/";
    removeCoinsLink = "http://bananas.multimediatechnology.be/api/removeCoins/";
    addXPLink = "http://bananas.multimediatechnology.be/api/addXP/";
    addLevelLink = "http://bananas.multimediatechnology.be/api/addLevel";
    updateImageLink = "http://bananas.multimediatechnology.be/api/rankImage/";
    addAPointsLink = "http://bananas.multimediatechnology.be/api/addPoints";
    removeAPointsLink = "http://bananas.multimediatechnology.be/api/removePoints";
    updateCoinMultiplierLink = "http://bananas.multimediatechnology.be/api/multiplier/";
    //updateRankLink = "http://bananas.multimediatechnology.be/api/";*/

    userLink = "http://bananas.multimediatechnology.be/api/user";
    coinsLink = "http://bananas.multimediatechnology.be/api/setCoins/";
    xpLink = "http://bananas.multimediatechnology.be/api/setXP/";
    levelLink = "http://bananas.multimediatechnology.be/api/setLevel/";
    rankLink = "http://bananas.multimediatechnology.be/api/setRank/";
    imageLink = "http://bananas.multimediatechnology.be/api/setRankImage/";
    multiplierLink = "http://bananas.multimediatechnology.be/api/setMultiplier/";
    aPointsLink = "http://bananas.multimediatechnology.be/api/setPoints/";

    coinDoublerLink = "http://bananas.multimediatechnology.be/api/setBoughtCoinDoubler";
    expDoublerLink = "http://bananas.multimediatechnology.be/api/setBoughtExpDoubler";
    likeUpgradeLink = "http://bananas.multimediatechnology.be/api/setBoughtLikeUpgrade";
    dislikeUpgradeLink = "http://bananas.multimediatechnology.be/api/setBoughtDislikeUpgrade";
    expPerDisLikeLink = "http://bananas.multimediatechnology.be/api/setExpPerDislike/";
    expPerLikeLink = "http://bananas.multimediatechnology.be/api/setExpPerLike/";
    coinPerDislikeLink = "http://bananas.multimediatechnology.be/api/setCoinPerDislike/";
    coinPerLikeLink = "http://bananas.multimediatechnology.be/api/setCoinsPerLike/";

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

    playerEmail = "frank@test.be";//emailField.text;//"mazurek.piotr@student.kdg.be";////
    playerPassword = "password";//passwordField.text;//"projectant";//

    if (playerEmail != "")
    {
      LoginPlayer(playerEmail, playerPassword, userLink);
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

  public void LoginPlayer(string email, string password, string urlToPost)
  {
    //Debug.Log("loginplayer");
    string loginUrl = "http://bananas.multimediatechnology.be/api/login";

    WWWForm loginForm = new WWWForm();
    loginForm.AddField("email", email);
    loginForm.AddField("password", password);

    WWW loginwww = new WWW(loginUrl, loginForm);

    StartCoroutine(PostPlayerLogin(loginwww, urlToPost));
  }

  public IEnumerator PostPlayerLogin(WWW www, string urlToPost)
  {
    //Debug.Log("postplayer");
    yield return www;

    if (www.error == null)
    {
      Debug.Log("LOGINWWW OK!: " + www.text);
      playerTokenJSON = JsonMapper.ToObject(www.text);
      playerToken = playerTokenJSON["token"].ToString();
      StartCoroutine(postToken(urlToPost, playerToken));
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
    Debug.Log("url =" + url);
    headers["Authorization"] = "Bearer: " + token;
    Debug.Log(headers["Authorization"]);

    WWW www = new WWW(url, rawData, headers);
    yield return www;

    if (www.error == null)
    {
      Debug.Log("POSTTOKEN OK!: " + www.text);
      if (url == userLink)
      {
        introCanvas.SetActive(false);
        playerData = JsonMapper.ToObject(www.text);
        player.SetActive(true);

      }
      /*else
      {
        playerTokenJSON = JsonMapper.ToObject(www.text);
        playerToken = playerTokenJSON["token"].ToString();
      }*/
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

    StartCoroutine(PostPlayerLogin(registerwww, RegisterUrl));
  }

  public void updateRankImage(string ImageRank)
  {
    LoginPlayer(playerEmail, playerPassword, rankLink + ImageRank);
  }

  public void updateCoins(int nrOfCoins)
  {
    LoginPlayer(playerEmail, playerPassword, coinsLink + nrOfCoins);
  }

  public void updateCoinMultiplier(float coinMultiplier)
  {
    LoginPlayer(playerEmail, playerPassword, multiplierLink + coinMultiplier);
  }

  public void updateXP(int xp)
  {
    LoginPlayer(playerEmail, playerPassword, xpLink + xp);
  }

  public void updateLevel(int level)
  {
    LoginPlayer(playerEmail, playerPassword, levelLink + level);
  }

  public void updateAPoints(int aPoints)
  {
    LoginPlayer(playerEmail, playerPassword, aPointsLink + aPoints);
  }

  public void setBoughtCoinDoubler()
  {
        LoginPlayer(playerEmail, playerPassword, coinDoublerLink);
    }

    public void setBoughtExpDoubler()
    {
        LoginPlayer(playerEmail, playerPassword, expDoublerLink);
    }

    public void setBoughtLikeUpgrade()
    {
        LoginPlayer(playerEmail, playerPassword, likeUpgradeLink);
    }

    public void setBoughtDislikeUpgrade()
    {
        LoginPlayer(playerEmail, playerPassword, dislikeUpgradeLink);
    }

    public void setExpPerLike(int nrOfExp)
    {
        LoginPlayer(playerEmail, playerPassword, expPerLikeLink + nrOfExp);
    }

    public void setExpPerDislike(int nrOfExp)
    {
        LoginPlayer(playerEmail, playerPassword, expPerDisLikeLink + nrOfExp);
    }

    public void setCoinsPerLike(int nrOfCoins)
    {
        LoginPlayer(playerEmail, playerPassword, coinPerLikeLink + nrOfCoins);
    }

    public void setCoinsPerDislike(int nrOfCoins)
    {
        LoginPlayer(playerEmail, playerPassword, coinPerDislikeLink + nrOfCoins);
    }
}

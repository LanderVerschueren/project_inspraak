using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class BuyUpgrades : MonoBehaviour {

    public GameObject player;
    public GameObject UI;

    public Button btn_Buy;
    public Text txt_BuyText;
    public GameObject errorMsg;
    public Color passiveColor;
	// Use this for initialization
	void Start () {
	    
	}
	
	// Update is called once per frame
	void Update () {
	
	}

    public void BuyLikeUpgrade(Text txt)
    {
        int cost = int.Parse(txt.text);
        if (player.GetComponent<PlayerSettings>().playerCoins - cost >= 0)
        {
            player.GetComponent<PlayerSettings>().playerCoins -= cost;
            player.GetComponent<PlayerSettings>().boughtLikeUpgrade = "1";
            player.GetComponent<PlayerSettings>().coinsPerLike = 10;
            SetBuyButtonDisabled();
            player.GetComponent<PlayerSettings>().PostSettings();

        }
        else ShowErrorMessage();
    }

    public void BuyDislikeUpgrade(Text txt)
    {
        int cost = int.Parse(txt.text);
        if (player.GetComponent<PlayerSettings>().playerCoins - cost >= 0)
        {
            player.GetComponent<PlayerSettings>().playerCoins -= cost;
            player.GetComponent<PlayerSettings>().boughtDislikeUpgrade = "1";
            
            player.GetComponent<PlayerSettings>().coinsPerDislike = 5;
            SetBuyButtonDisabled();
            player.GetComponent<PlayerSettings>().PostSettings();
        }
        else ShowErrorMessage();
    }
    
    public void BuyCoinDoubler(Text txt)
    {
        int cost = int.Parse(txt.text);
        if (player.GetComponent<PlayerSettings>().playerCoins - cost >= 0)
        {
            player.GetComponent<PlayerSettings>().playerCoins -= cost;
            player.GetComponent<PlayerSettings>().boughtCoinDoubler = "1";
            SetBuyButtonDisabled();
            player.GetComponent<PlayerSettings>().PostSettings();
        }
        else ShowErrorMessage();
    }
    public void BuyExpDoubler(Text txt)
    {
        int cost = int.Parse(txt.text);
        if (player.GetComponent<PlayerSettings>().playerCoins - cost >= 0)
        {
            player.GetComponent<PlayerSettings>().playerCoins -= cost;
            player.GetComponent<PlayerSettings>().boughtExpDoubler = "1";
            SetBuyButtonDisabled();

            player.GetComponent<PlayerSettings>().PostSettings();
        }
        else ShowErrorMessage();
    }
  

   private void ShowErrorMessage()
    {
        UI.GetComponent<UILogic>().OpenTab(errorMsg);
    }

    public void SetBuyButtonDisabled()
    {
        txt_BuyText.text = "Gekocht";
        btn_Buy.interactable = false;
        btn_Buy.image.color = passiveColor;
    }

}

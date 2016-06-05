using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class BuyUpgrades : MonoBehaviour {

    public GameObject player;
    public GameObject UI;

    
    public GameObject errorMsg;

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
            player.GetComponent<PlayerSettings>().boughtLikeUpgrade = true;
        }
        else ShowErrorMessage();
    }

    public void BuyDislikeUpgrade(Text txt)
    {
        int cost = int.Parse(txt.text);
        if (player.GetComponent<PlayerSettings>().playerCoins - cost >= 0)
        {
            player.GetComponent<PlayerSettings>().playerCoins -= cost;
            player.GetComponent<PlayerSettings>().boughtDislikeUpgrade = true;
        }
        else ShowErrorMessage();
    }
    
    public void BuyCoinDoubler(Text txt)
    {
        int cost = int.Parse(txt.text);
        if (player.GetComponent<PlayerSettings>().playerCoins - cost >= 0)
        {
            player.GetComponent<PlayerSettings>().playerCoins -= cost;
            player.GetComponent<PlayerSettings>().boughtCoinDoubler = true;
        }
        else ShowErrorMessage();
    }
    public void BuyExpDoubler(Text txt)
    {
        int cost = int.Parse(txt.text);
        if (player.GetComponent<PlayerSettings>().playerCoins - cost >= 0)
        {
            player.GetComponent<PlayerSettings>().playerCoins -= cost;
            player.GetComponent<PlayerSettings>().boughtExpDoubler = true;
        }
        else ShowErrorMessage();
    }

   private void ShowErrorMessage()
    {
        UI.GetComponent<UILogic>().OpenTab(errorMsg);
    }

}

using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class BuyApoints: MonoBehaviour {

    public GameObject player;
    public GameObject UI;
    public GameObject Errorpanel;

    public Text txt_price_coins;
    public Text txt_reward_apoints;

    private int pCoins;
    private int rewApoints;

	// Use this for initialization
	void Start () {
        pCoins = int.Parse(txt_price_coins.text);
        rewApoints = int.Parse(txt_reward_apoints.text);
  	
	}
	
	// Update is called once per frame
	void Update () {
	
	}

    public void Buy()
    {
        if(player.GetComponent<PlayerSettings>().playerCoins - pCoins >= 0)
        {
            player.GetComponent<PlayerSettings>().playerCoins -= pCoins;
            player.GetComponent<PlayerSettings>().playerApoints += rewApoints;
        }
        else
        {
            UI.GetComponent<UILogic>().OpenTab(Errorpanel);
        }
    }
}

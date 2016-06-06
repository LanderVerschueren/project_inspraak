using UnityEngine;
using System.Collections;

public class CoinBonusDemo : MonoBehaviour {

    public GameObject player;
	// Use this for initialization
	void Start () {
        
	}
	
	// Update is called once per frame
	void Update () {
	
	}

    public void Bonus()
    {
        player.GetComponent<PlayerSettings>().playerCoins += 1000;
        player.GetComponent<PlayerSettings>().experiencePoints += 10000;
        player.GetComponent<PlayerSettings>().PostSettings();
    }
}

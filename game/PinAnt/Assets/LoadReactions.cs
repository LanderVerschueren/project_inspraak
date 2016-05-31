using UnityEngine;
using System.Collections;
using LitJson;

public class LoadReactions : MonoBehaviour {

  private JsonData itemData;

	// Use this for initialization
  IEnumerator Start()
  {
    string url = "http://bananas.multimediatechnology.be/api/comments";

    WWW www = new WWW(url);
    yield return www;
    Debug.Log(url);
    if (www.error == null)
    {
      itemData = JsonMapper.ToObject(www.text);
    }
    else
    {
      Debug.Log("ERROR: " + www.error);
    }
  }
	
	// Update is called once per frame
	void Update () {
	
	}
}

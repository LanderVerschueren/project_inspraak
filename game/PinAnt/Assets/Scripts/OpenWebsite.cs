using UnityEngine;
using System.Collections;

public class OpenWebsite : MonoBehaviour {

    public void GoToWebsite()
    {
      Application.OpenURL("http://bananas.multimediatechnology.be/");
    }

}

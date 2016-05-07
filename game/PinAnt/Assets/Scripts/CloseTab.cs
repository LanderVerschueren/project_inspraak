using UnityEngine;
using System.Collections;

public class CloseTab : MonoBehaviour {

    public GameObject tabToClose;

    public void Close_Tab()
    {
        tabToClose.SetActive(false);
    }
}

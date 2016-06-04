using UnityEngine;
using System.Collections;

public class HamburgerClose : MonoBehaviour
{
  public void Close()
  {
    HambugerOpen.isOpen = false;
  }
}
